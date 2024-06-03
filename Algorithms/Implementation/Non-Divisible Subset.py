import os
from collections import Counter

#
# Complete the 'nonDivisibleSubset' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER k
#  2. INTEGER_ARRAY s
#

def nonDivisibleSubset(k, s):
    # Write your code here
    mod_counts = [0] * k
    for num in s:
        mod_counts[num % k] += 1

    count = min(mod_counts[0], 1)

    for i in range(1, (k // 2) + 1):
        if i != k - i:
            count += max(mod_counts[i], mod_counts[k - i])
        else:
            count += 1

    return count


if __name__ == "__main__":
    first_multiple_input = input().rstrip().split()

    n = int(first_multiple_input[0])
    k = int(first_multiple_input[1])

    s = list(map(int, input().rstrip().split()))

    result = nonDivisibleSubset(k, s)

    print(result)
