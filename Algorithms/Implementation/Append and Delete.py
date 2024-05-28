import os

#
# Complete the 'appendAndDelete' function below.
#
# The function is expected to return a STRING.
# The function accepts following parameters:
#  1. STRING s
#  2. STRING t
#  3. INTEGER k
#

def appendAndDelete(s, t, k):
    # Write your code here
    length = 0
    for i in range(min(len(s), len(t))):
        if s[i] == t[i]:
            length += 1
        else:
            break

    ops = len(s) + len(t) - 2 * length

    return "Yes" if ops <= k and (k - ops) % 2 == 0 or k >= len(s) + len(t) else "No"


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    s = input()
    t = input()
    k = int(input().strip())

    result = appendAndDelete(s, t, k)
    fptr.write(result + '\n')
    fptr.close()
