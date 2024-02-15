# language: pypy3

from itertools import combinations

elem, num = input().split()
k = int(num)

for i in range(k):
    for j in combinations(sorted(elem), i + 1):
        print("".join(j))
