import os
from collections import Counter


#
# Complete the 'happyLadybugs' function below.
#
# The function is expected to return a STRING.
# The function accepts STRING b as parameter.
#

def happyLadybugs(b):
    # Write your code here
    count = Counter(b)

    if len(b) == 1:
        return "NO" if b[0] != "_" else "YES"

    if "_" not in count:
        for i in range(1, len(b) - 1):
            if b[i] != b[i - 1] and b[i] != b[i + 1]:
                return "NO"
        if b[0] != b[1] or b[-1] != b[-2]:
            return "NO"
        return "YES"

    for key in count:
        if key != "_" and count[key] == 1:
            return "NO"

    return "YES"


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    g = int(input().strip())

    for g_itr in range(g):
        n = int(input().strip())

        b = input()

        result = happyLadybugs(b)

        fptr.write(result + '\n')

    fptr.close()
