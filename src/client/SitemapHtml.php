<?php

namespace Suxianjia\xianjiasitemap\client;

date_default_timezone_set('PRC');
 

class SitemapHtml
{
	// sitemap to html
	private string $filePath;
	private array $items = [];

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

	public function addItem(string $location,  $title = null): void
	{
		$this->items[] = [
			'location' => $location,
 
			'title' => $title,
			// add tag for sitemap to html	 title
		];
	}

	public function getFilePath(): string
	{
		return $this->filePath;
	}

	public function write(): void
	{
		$html = $this->generateHtml();
		file_put_contents($this->filePath, $html);
	}

	private function generateHtml(): string
	{
		// header("Content-Type: text/html; charset=UTF-8");
		$html = "<!DOCTYPE html>\n<html>\n<head>\n<meta charset=\"UTF-8\">\n<title>Sitemap</title>\n</head>\n<body>\n";
		$html .= "<h1>Sitemap</h1>\n<ul>\n";

		foreach ($this->items as $item) {
			$html .= "<li> <a href=\"{$item['location']}\" title=\"{$item['title']}\">{$item['title']}</a> </li>\n";
		}

		$html .= "</ul>\n</body>\n</html>";
		return $html;
	}
}