# language: pypy3

from collections import Counter

num_shoes = int(input())
shoe_sizes = Counter(map(int, input().split()))
num_customers = int(input())

earned = 0
for _ in range(num_customers):
    size, price = map(int, input().split())
    if shoe_sizes[size]:
        earned += price
        shoe_sizes[size] -= 1

print(earned)
