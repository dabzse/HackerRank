# language: pypy3

# Enter your code here. Read input from STDIN. Print output to STDOUT

"""
this is a pythonic way
"""

a, b, c, d = [int(input()) for _ in range(4)]
print(a ** b + c ** d)

"""
# this is a "user-friendly" way

a = int(input())
b = int(input())
c = int(input())
d = int(input())

print(a**b + c**d)
"""
