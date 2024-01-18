# language: pypy3

_ = input()
n = input().split()
print(all([int(i) > 0 for i in n]) and any([j == j[::-1] for j in n]))

# "only 3 lines, no comments at all"