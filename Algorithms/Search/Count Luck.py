import os

#
# Complete the 'countLuck' function below.
#
# The function is expected to return a STRING.
# The function accepts following parameters:
#  1. STRING_ARRAY matrix
#  2. INTEGER k
#

DIRECTIONS = [(0, 1), (1, 0), (0, -1), (-1, 0)]

def countLuck(matrix, k):
    # Write your code here
    n, m = len(matrix), len(matrix[0])
    start = None
    end = None

    for i in range(n):
        for j in range(m):
            if matrix[i][j] == "M":
                start = (i, j)
            elif matrix[i][j] == "*":
                end = (i, j)

    def is_valid(x, y):
        return 0 <= x < n and 0 <= y < m and matrix[x][y] != "X"

    def dfs(x, y, visited):
        if matrix[x][y] == "*":
            return True, 0

        visited.add((x, y))

        valid_moves = 0
        for dx, dy in DIRECTIONS:
            nx, ny = x + dx, y + dy
            if is_valid(nx, ny) and (nx, ny) not in visited:
                valid_moves += 1

        junctions = 0
        for dx, dy in DIRECTIONS:
            nx, ny = x + dx, y + dy
            if is_valid(nx, ny) and (nx, ny) not in visited:
                found_exit, sub_junctions = dfs(nx, ny, visited)
                if found_exit:
                    junctions += sub_junctions
                    if valid_moves > 1:
                        junctions += 1
                    return True, junctions

        return False, 0

    visited = set()
    _, junctions_count = dfs(start[0], start[1], visited)

    if junctions_count == k:
        return "Impressed"
    else:
        return "Oops!"


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    t = int(input().strip())

    for t_itr in range(t):
        first_multiple_input = input().rstrip().split()

        n = int(first_multiple_input[0])
        m = int(first_multiple_input[1])

        matrix = []

        for _ in range(n):
            matrix_item = input()
            matrix.append(matrix_item)

        k = int(input().strip())

        result = countLuck(matrix, k)

        fptr.write(result + '\n')

    fptr.close()
