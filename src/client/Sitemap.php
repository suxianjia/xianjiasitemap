<?php
namespace Suxianjia\xianjiasitemap\client;
use XMLWriter;


/*
	use Suxianjia\Xianjiasitemap\client\Sitemap;
	use Suxianjia\Xianjiasitemap\client\SitemapIndex;

	// create sitemap
	$sitemap = new Sitemap(__DIR__ . '/sitemap.xml');

	// add some URLs
	$sitemap->addItem('http://example.com/mylink1');
	$sitemap->addItem('http://example.com/mylink2', time());
	$sitemap->addItem('http://example.com/mylink3', time(), Sitemap::HOURLY);
	$sitemap->addItem('http://example.com/mylink4', time(), Sitemap::DAILY, 0.3);

	// write it
	$sitemap->write();

	// get URLs of sitemaps written
	$sitemapFileUrls = $sitemap->getSitemapUrls('http://example.com/');

	// create sitemap for static files
	$staticSitemap = new Sitemap(__DIR__ . '/sitemap_static.xml');

	// add some URLs
	$staticSitemap->addItem('http://example.com/about');
	$staticSitemap->addItem('http://example.com/tos');
	$staticSitemap->addItem('http://example.com/jobs');

	// write it
	$staticSitemap->write();

	// get URLs of sitemaps written
	$staticSitemapUrls = $staticSitemap->getSitemapUrls('http://example.com/');

	// create sitemap index file
	$index = new SitemapIndex(__DIR__ . '/sitemap_index.xml');

	// add URLs
	foreach ($sitemapFileUrls as $sitemapUrl) {
		$index->addSitemap($sitemapUrl);
	}

	// add more URLs
	foreach ($staticSitemapUrls as $sitemapUrl) {
		$index->addSitemap($sitemapUrl);
	}

	// write it
	$index->write();
 */



/**
 * A class for generating Sitemaps (http://www.sitemaps.org/)
 *
 * @author Alexander Makarov <sam@rmcreative.ru>
 */
class Sitemap
{
	const ALWAYS = 'always';
	const HOURLY = 'hourly';
	const DAILY = 'daily';
	const WEEKLY = 'weekly';
	const MONTHLY = 'monthly';
	const YEARLY = 'yearly';
	const NEVER = 'never';
	/**
	 * @var integer Maximum allowed number of URLs in a single file.
	 */
	private int $maxUrls = 50000;
	/**
	 * @var integer number of URLs added
	 */
	private int $urlsCount = 0;
	/**
	 * @var string path to the file to be written
	 */
	private string $filePath;
	/**
	 * @var integer number of files written
	 */
	private int $fileCount = 0;
	/**
	 * @var array path of files written
	 */
	private array $writtenFilePaths = array();
	/**
	 * @var integer number of URLs to be kept in memory before writing it to file
	 */
	private int $bufferSize = 1000;
	/**
	 * @var bool if XML should be indented
	 */
	private bool $useIndent = true;
	/**
	 * @var array valid values for frequency parameter
	 */
	private array $validFrequencies = array(
		self::ALWAYS,
		self::HOURLY,
		self::DAILY,
		self::WEEKLY,
		self::MONTHLY,
		self::YEARLY,
		self::NEVER
	);
	/**
	 * @var XMLWriter
	 */
	private ?XMLWriter $writer = null;
	/**
	 * @param string $filePath path of the file to write to
	 * @throws \InvalidArgumentException
	 */
	public function __construct(string $filePath)
	{
		$dir = dirname($filePath);
		if (!is_dir($dir)) {
			throw new \InvalidArgumentException(
				"Please specify valid file path. Directory not exists. You have specified: {$dir}."
			);
		}
		$this->filePath = $filePath;
	}
	/**
	 * Creates new file
	 */
	private function createNewFile(): void
    {
		$this->fileCount++;
		$filePath = $this->getCurrentFilePath();
		$this->writtenFilePaths[] = $filePath;
		@unlink($filePath);
		$this->writer = new XMLWriter();
		$this->writer->openMemory();
		$this->writer->startDocument('1.0', 'UTF-8');
		$this->writer->setIndent($this->useIndent);
		$this->writer->startElement('urlset');
		$this->writer->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
	}
	/**
	 * Writes closing tags to current file
	 */
	private function finishFile(): void
    {
		if ($this->writer !== null) {
			$this->writer->endElement();
			$this->writer->endDocument();
			$this->flush();
		}
	}
	/**
	 * Finishes writing
	 */
	public function write(): void
    {
		$this->finishFile();
	}
	/**
	 * Flushes buffer into file
	 */
	private function flush(): void
    {
		file_put_contents($this->getCurrentFilePath(), $this->writer->flush(true), FILE_APPEND);
	}
	/**
	 * Adds a new item to sitemap
	 *
	 * @param string $location location item URL
	 * @param integer $lastModified last modification timestamp
	 * @param float $changeFrequency change frequency. Use one of self:: constants here
	 * @param string $priority item's priority (0.0-1.0). Default null is equal to 0.5
	 *
	 * @throws \InvalidArgumentException
	 */
	public function addItem(string $location, $lastModified = null, $changeFrequency = null, $priority = null): void
    {
		if ($this->urlsCount === 0) {
			$this->createNewFile();
		} elseif ($this->urlsCount % $this->maxUrls === 0) {
			$this->finishFile();
			$this->createNewFile();
		}
		if ($this->urlsCount % $this->bufferSize === 0) {
			$this->flush();
		}
		$this->writer->startElement('url');
		if (false === filter_var($location, FILTER_VALIDATE_URL)) {
			throw new \InvalidArgumentException(
				"The location must be a valid URL. You have specified: {$location}."
			);
		}
		$this->writer->writeElement('loc', $location);
		if ($lastModified !== null) {
			$this->writer->writeElement('lastmod', date('c', $lastModified));
		}
		if ($changeFrequency !== null) {
			if (!in_array($changeFrequency, $this->validFrequencies, true)) {
				throw new \InvalidArgumentException(
					'Please specify valid changeFrequency. Valid values are: '
					. implode(', ', $this->validFrequencies)
					. "You have specified: {$changeFrequency}."
				);
			}
			$this->writer->writeElement('changefreq', $changeFrequency);
		}
		if ($priority !== null) {
			if (!is_numeric($priority) || $priority < 0 || $priority > 1) {
				throw new \InvalidArgumentException(
					"Please specify valid priority. Valid values range from 0.0 to 1.0. You have specified: {$priority}."
				);
			}
			$this->writer->writeElement('priority', number_format($priority, 1, '.', ','));
		}
		$this->writer->endElement();
		$this->urlsCount++;
	}
	/**
	 * @return string path of currently opened file
	 */
	private function getCurrentFilePath(): string
    {
		if ($this->fileCount < 2) {
			return $this->filePath;
		}
		$parts = pathinfo($this->filePath);
		return $parts['dirname'] . DIRECTORY_SEPARATOR . $parts['filename'] . '_' . $this->fileCount . '.' . $parts['extension'];
	}
	/**
	 * Returns an array of URLs written
	 *
	 * @param string $baseUrl base URL of all the sitemaps written
	 * @return array URLs of sitemaps written
	 */
	public function getSitemapUrls(string $baseUrl): array
    {
		$urls = array();
		foreach ($this->writtenFilePaths as $file) {
			$urls[] = $baseUrl . pathinfo($file, PATHINFO_BASENAME);
		}
		return $urls;
	}
	/**
	 * Sets maximum number of URLs to write in a single file.
	 * Default is 50000.
	 * @param integer $number
	 */
	public function setMaxUrls(int $number): void
    {
		$this->maxUrls = (int)$number;
	}
	/**
	 * Sets number of URLs to be kept in memory before writing it to file.
	 * Default is 1000.
	 *
	 * @param integer $number
	 */
	public function setBufferSize(int $number): void
    {
		$this->bufferSize = (int)$number;
	}
	/**
	 * Sets if XML should be indented.
	 * Default is true.
	 *
	 * @param bool $value
	 */
	public function setUseIndent(bool $value): void
    {
		$this->useIndent = (bool)$value;
	}
}
