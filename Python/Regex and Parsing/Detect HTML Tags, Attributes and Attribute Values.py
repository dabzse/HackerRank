# language: pypy3

from html.parser import HTMLParser


class MyHTMLParser(HTMLParser):
    def handle_starttag(self, tag, attrs):
        print(tag)
        for attr in attrs:
            print("-> {} > {}".format(*attr))


HTML = "\n".join([input() for _ in range(int(input()))])
parser = MyHTMLParser()
parser.feed(HTML)
parser.close()
