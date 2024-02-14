# language: pypy3

from itertools import permutations

elem, num = input().split()

for i in permutations(sorted(elem), int(num)):
    print("".join(i))
