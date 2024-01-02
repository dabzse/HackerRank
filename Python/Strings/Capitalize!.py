# language: pypy3

import os

# Complete the solve function below.
def solve(s):
    for c in s.split():
        s = s.replace(c, c.capitalize())
    return s

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')
    s = input()
    result = solve(s)
    fptr.write(result + '\n')
    fptr.close()
