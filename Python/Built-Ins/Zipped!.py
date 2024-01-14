# language: pypy3

n, x = map(int, input().split())

gradebook = []
for _ in range(x):
    gradebook.append(map(float, input().split()))

for i in zip(*gradebook):
    print(sum(i) / len(i))