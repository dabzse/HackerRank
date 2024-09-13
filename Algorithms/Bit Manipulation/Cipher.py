import os

#
# Complete the 'cipher' function below.
#
# The function is expected to return a STRING.
# The function accepts following parameters:
#  1. INTEGER k
#  2. STRING s
#

def cipher(k, s):
    # Write your code here
    n = len(s)
    result = [0] * (n - k + 1)
    xor_accumulated = 0

    for i in range(n - k + 1):
        current_bit = int(s[i]) ^ xor_accumulated
        result[i] = current_bit

        xor_accumulated ^= current_bit

        if i >= k - 1:
            xor_accumulated ^= result[i - k + 1]

    return "".join(map(str, result))


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    first_multiple_input = input().rstrip().split()

    n = int(first_multiple_input[0])
    k = int(first_multiple_input[1])

    s = input()

    result = cipher(k, s)

    fptr.write(result + '\n')
    fptr.close()
