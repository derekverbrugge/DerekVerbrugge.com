import re
from pathlib import Path
from html.parser import HTMLParser
from urllib.parse import quote
from xml.etree.ElementTree import Element, SubElement, tostring
ROOT=Path(__file__).resolve().parents[1]
BASE="https://derekverbrugge.com/"
class Text(HTMLParser):
    def __init__(self):
        super().__init__(); self.parts=[]; self.skip=0
    def handle_starttag(self,tag,attrs):
        if tag in ('script','style'): self.skip+=1
        if tag in ('p','h1','h2','h3','li','section','br','tr'): self.parts.append('\n')
    def handle_endtag(self,tag):
        if tag in ('script','style'): self.skip=max(0,self.skip-1)
        self.parts.append(' ')
    def handle_data(self,data):
        if not self.skip: self.parts.append(data)
def plain(s):
    p=Text(); p.feed(s)
    return '\n'.join(' '.join(x.split()) for x in ''.join(p.parts).splitlines() if x.strip())
pages=[]
for p in sorted(ROOT.rglob('*.html')):
    rel=p.relative_to(ROOT)
    if any(x.startswith('.') or x.lower() in {'vendor','node_modules','third_party','thirdparty','tests','examples'} for x in rel.parts) or p.name in ('header.html','footer.html','404.html'): continue
    raw=p.read_text(encoding='utf-8')
    if not re.search(r'<head\b',raw,re.I) or re.search(r'<meta[^>]*name=["\']robots["\'][^>]*noindex',raw,re.I): continue
    url=BASE+quote(str(rel).removesuffix('index.html') if p.name=='index.html' else str(rel))
    title=re.search(r'<title[^>]*>(.*?)</title>',raw,re.S|re.I)
    main=re.search(r'<main\b[^>]*>(.*?)</main>',raw,re.S|re.I)
    pages.append((url,plain(title.group(1)) if title else p.stem,plain(main.group(1) if main else raw.split('</head>',1)[-1])))
assert pages
root=Element('urlset',xmlns='http://www.sitemaps.org/schemas/sitemap/0.9')
for u,t,b in pages: SubElement(SubElement(root,'url'),'loc').text=u
(ROOT/'sitemap.xml').write_bytes(b'<?xml version="1.0" encoding="UTF-8"?>\n'+tostring(root,encoding='utf-8')+b'\n')
(ROOT/'robots.txt').write_text('User-agent: *\nAllow: /\nSitemap: '+BASE+'sitemap.xml\n',encoding='utf-8')
(ROOT/'llms.txt').write_text('# '+"DerekVerbrugge.com"+'\n\n'+ '\n'.join('- ['+t+']('+u+')' for u,t,b in pages)+'\n\n[Full text]('+BASE+'llms-full.txt)\n',encoding='utf-8')
(ROOT/'llms-full.txt').write_text('# '+"DerekVerbrugge.com"+'\n\n'+'\n\n'.join('## '+t+'\nSource: '+u+'\n\n'+b for u,t,b in pages)+'\n',encoding='utf-8')
