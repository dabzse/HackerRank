# language: pypy3

from itertools import product

A = list(map(int, input().split()))
B = list(map(int, input().split()))

prod = list(product(A, B))
print(" ".join(map(str, prod)))
