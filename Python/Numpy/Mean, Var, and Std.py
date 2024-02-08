# language: pypy3

import numpy as np


n, m = map(int, input().split())
arr = np.array([input().split() for _ in range(n)],dtype=np.float)
print(np.mean(arr, axis=1), np.var(arr, axis=0), round(np.std(arr, axis=None), 11), sep='\n')