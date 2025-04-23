

import xml.etree.ElementTree as ET
# python3 start.py
# 动态页面、
# 页面优先级、
# 最后修改时间等。

def create_sitemap(urls):
    root = ET.Element("urlset", {"xmlns": "http://www.sitemaps.org/schemas/sitemap/0.9"})

    for url in urls:
        url_elem = ET.SubElement(root, "url")
        loc_elem = ET.SubElement(url_elem, "loc")
        loc_elem.text = url

    tree = ET.ElementTree(root)
    tree.write("sitemap.xml", encoding='utf-8', xml_declaration=True)

# 示例URL列表
urls = [
    "https://www.example.com/",
    "https://www.example.com/about/",
    "https://www.example.com/contact/"
]

create_sitemap(urls)
