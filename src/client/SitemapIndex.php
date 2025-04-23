<?php
namespace Suxianjia\xianjiasitemap\client;
use XMLWriter;

/**
 * A class for generating Sitemap index (http://www.sitemaps.org/)
 *
 * @author Alexander Makarov <sam@rmcreative.ru>
 */

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

class SitemapIndex
{
	/**
	 * @var XMLWriter
	 */
	private ?XMLWriter $writer = null;
	/**
	 * @var string index file path
	 */
	private string $filePath;
	/**
	 * @param string $filePath index file path
	 */
	public function __construct(string $filePath)
	{
		$this->filePath = $filePath;
	}
	/**
	 * Creates new file
	 */
	private function createNewFile(): void
    {
		$this->writer = new XMLWriter();
		$this->writer->openMemory();
		$this->writer->startDocument('1.0', 'UTF-8');
		$this->writer->setIndent(true);
		$this->writer->startElement('sitemapindex');
		$this->writer->writeAttribute('xmlns', 'https://www.sitemaps.org/schemas/sitemap/0.9');
	}
	/**
	 * Adds sitemap link to the index file
	 *
	 * @param string $location URL of the sitemap
	 * @param integer $lastModified unix timestamp of sitemap modification time
	 * @throws \InvalidArgumentException
	 */
	public function addSitemap(string $location, $lastModified = null): void
    {
		if (false === filter_var($location, FILTER_VALIDATE_URL)) {
			throw new \InvalidArgumentException(
				"The location must be a valid URL. You have specified: {$location}."
			);
		}
		if ($this->writer === null) {
			$this->createNewFile();
		}
		$this->writer->startElement('sitemap');
		$this->writer->writeElement('loc', $location);
		if ($lastModified !== null) {
			$this->writer->writeElement('lastmod', date('c', $lastModified));
		}
		$this->writer->endElement();
	}
	/**
	 * @return string index file path
	 */
	public function getFilePath(): string
    {
		return $this->filePath;
	}
	/**
	 * Finishes writing
	 */
	public function write(): void
    {
		if ($this->writer instanceof XMLWriter) {
			$this->writer->endElement();
			$this->writer->endDocument();
			file_put_contents($this->getFilePath(), $this->writer->flush());
		}
	}
}
