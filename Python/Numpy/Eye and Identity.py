# language: pypy3

import numpy

numpy.set_printoptions(sign=' ')
print(numpy.eye(*map(int, input().split())))