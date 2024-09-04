import os

#
# Complete the 'boardCutting' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER_ARRAY cost_y
#  2. INTEGER_ARRAY cost_x
#

def boardCutting(cost_y, cost_x):
    # Write your code here
    cost_y.sort(reverse=True)
    cost_x.sort(reverse=True)

    horizontal_pieces = 1
    vertical_pieces = 1

    total_cost = 0
    i, j = 0, 0

    while i < len(cost_y) and j < len(cost_x):
        if cost_y[i] > cost_x[j] or (
            cost_y[i] == cost_x[j] and horizontal_pieces <= vertical_pieces
        ):
            total_cost += cost_y[i] * vertical_pieces
            horizontal_pieces += 1
            i += 1
        else:
            total_cost += cost_x[j] * horizontal_pieces
            vertical_pieces += 1
            j += 1

    while i < len(cost_y):
        total_cost += cost_y[i] * vertical_pieces
        i += 1

    while j < len(cost_x):
        total_cost += cost_x[j] * horizontal_pieces
        j += 1

    return total_cost % (10**9 + 7)


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    q = int(input().strip())

    for q_itr in range(q):
        first_multiple_input = input().rstrip().split()

        m = int(first_multiple_input[0])
        n = int(first_multiple_input[1])

        cost_y = list(map(int, input().rstrip().split()))
        cost_x = list(map(int, input().rstrip().split()))

        result = boardCutting(cost_y, cost_x)

        fptr.write(str(result) + '\n')

    fptr.close()
