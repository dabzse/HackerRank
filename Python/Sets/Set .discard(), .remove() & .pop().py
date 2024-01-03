# language: pypy3

n = int(input())
set_s = set(map(int, input().split()))
N = int(input())

for _ in range(N):
    command = input().split()
    if command[0] == "pop":
        l = list(set_s)
        l.reverse()
        l.pop()
        l.reverse()
        set_s = set(l)
    else:
        set_s.discard(int(command[1]))

print(sum(set_s))
