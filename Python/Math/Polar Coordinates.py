# language: pypy3

import cmath

z = complex(input())
print(*cmath.polar(z), sep='\n')
