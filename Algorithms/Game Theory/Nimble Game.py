import os

#
# Complete the 'nimbleGame' function below.
#
# The function is expected to return a STRING.
# The function accepts INTEGER_ARRAY s as parameter.
#


def nimbleGame(s):
    xor_sum = 0
    for i, coins in enumerate(s):
        if coins % 2 != 0:
            xor_sum ^= i

    if xor_sum == 0:
        return "Second"
    else:
        return "First"


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    t = int(input().strip())

    for t_itr in range(t):
        n = int(input().strip())

        s = list(map(int, input().rstrip().split()))

        result = nimbleGame(s)

        fptr.write(result + '\n')

    fptr.close()
