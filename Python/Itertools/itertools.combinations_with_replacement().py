# language: pypy3

from itertools import combinations_with_replacement as cwr

source, times = input().split()

print("\n".join(map("".join, cwr(sorted(source), int(times)))))
