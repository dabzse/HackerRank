from collections import deque

#
# Complete the 'printShortestPath' function below.
#
# The function accepts following parameters:
#  1. INTEGER n
#  2. INTEGER i_start
#  3. INTEGER j_start
#  4. INTEGER i_end
#  5. INTEGER j_end
#

def printShortestPath(n, i_start, j_start, i_end, j_end):
    # Print the distance along with the sequence of moves.
    directions = [
        (-2, -1, "UL"),
        (-2, 1, "UR"),
        (0, 2, "R"),
        (2, 1, "LR"),
        (2, -1, "LL"),
        (0, -2, "L"),
    ]

    queue = deque([((i_start, j_start), [])])
    visited = set()
    visited.add((i_start, j_start))

    while queue:
        (i, j), path = queue.popleft()

        if i == i_end and j == j_end:
            print(len(path))
            print(" ".join(path))
            return

        for di, dj, move in directions:
            new_i, new_j = i + di, j + dj
            if 0 <= new_i < n and 0 <= new_j < n and (new_i, new_j) not in visited:
                queue.append(((new_i, new_j), path + [move]))
                visited.add((new_i, new_j))

    print("Impossible")


if __name__ == '__main__':
    n = int(input().strip())

    first_multiple_input = input().rstrip().split()

    i_start = int(first_multiple_input[0])
    j_start = int(first_multiple_input[1])

    i_end = int(first_multiple_input[2])
    j_end = int(first_multiple_input[3])

    printShortestPath(n, i_start, j_start, i_end, j_end)
