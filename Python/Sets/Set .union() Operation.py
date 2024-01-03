# language: pypy3

EN = int(input())
en_std = set(list(map(int, input().split())))
FR = int(input())
fr_std = set(list(map(int, input().split())))

print(len(list(en_std.union(fr_std))))
