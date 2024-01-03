# language: pypy3

M = int(input())
M_set = set(map(int, input().split()))
N = int(input())
N_set = set(map(int, input().split()))

print(*sorted(M_set.difference(N_set).union(N_set.difference(M_set))), sep="\n")
