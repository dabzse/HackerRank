import os

#
# Complete the 'counterGame' function below.
#
# The function is expected to return a STRING.
# The function accepts LONG_INTEGER n as parameter.
#


def counterGame(n):
    # Write your code here
    turn_count = 0

    while n > 1:
        if (n & (n - 1)) == 0:
            n //= 2
        else:
            n -= 2 ** (n.bit_length() - 1)
        turn_count += 1

    return "Richard" if turn_count % 2 == 0 else "Louise"


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    t = int(input().strip())

    for t_itr in range(t):
        n = int(input().strip())

        result = counterGame(n)

        fptr.write(result + '\n')

    fptr.close()
