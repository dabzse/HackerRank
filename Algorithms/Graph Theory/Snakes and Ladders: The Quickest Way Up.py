import os
from collections import deque

#
# Complete the 'quickestWayUp' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. 2D_INTEGER_ARRAY ladders
#  2. 2D_INTEGER_ARRAY snakes
#

def quickestWayUp(ladders, snakes):
    # Write your code here
    board = list(range(101))

    for ladder in ladders:
        start, end = ladder
        board[start] = end

    for snake in snakes:
        start, end = snake
        board[start] = end

    queue = deque([(1, 0)])
    visited = [False] * 101
    visited[1] = True

    while queue:
        current_square, moves = queue.popleft()

        if current_square == 100:
            return moves
        for roll in range(1, 7):
            next_square = current_square + roll

            if next_square <= 100 and not visited[next_square]:
                visited[next_square] = True
                queue.append(
                    (board[next_square], moves + 1)
                )

    return -1


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    t = int(input().strip())

    for t_itr in range(t):
        n = int(input().strip())

        ladders = []

        for _ in range(n):
            ladders.append(list(map(int, input().rstrip().split())))

        m = int(input().strip())

        snakes = []

        for _ in range(m):
            snakes.append(list(map(int, input().rstrip().split())))

        result = quickestWayUp(ladders, snakes)

        fptr.write(str(result) + '\n')

    fptr.close()
