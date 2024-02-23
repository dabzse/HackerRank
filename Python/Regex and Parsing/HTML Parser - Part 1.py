# language: pypy3

from html.parser import HTMLParser


class MyHTMLParser(HTMLParser):
    def handle_starttag(self, tag, attrs):
        print("Start :", tag)
        for elem in attrs:
            print("->", elem[0], ">", elem[1])

    def handle_endtag(self, tag):
        print("End   :", tag)

    def handle_startendtag(self, tag, attrs):
        print("Empty :", tag)
        for elem in attrs:
            print("->", elem[0], ">", elem[1])


parser = MyHTMLParser()
for _ in range(int(input())):
    parser.feed(input())
