import os
import sys

#
# Complete the 'sillyGame' function below.
#
# The function is expected to return a STRING.
# The function accepts INTEGER n as parameter.
#

def sieve_of_eratosthenes(n):
    primes = [True] * (n + 1)
    p = 2
    while p * p <= n:
        if primes[p]:
            for i in range(p * p, n + 1, p):
                primes[i] = False
        p += 1
    prime_count = sum(1 for p in range(2, n + 1) if primes[p])
    return prime_count

def sillyGame(n):
    # Write your code here
    prime_count = sieve_of_eratosthenes(n)
    if prime_count % 2 == 1:
        return "Alice"
    else:
        return "Bob"


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    g = int(input().strip())

    for g_itr in range(g):
        n = int(input().strip())

        result = sillyGame(n)

        fptr.write(result + '\n')

    fptr.close()
