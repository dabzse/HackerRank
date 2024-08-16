import os

#
# Complete the 'connectedCell' function below.
#
# The function is expected to return an INTEGER.
# The function accepts 2D_INTEGER_ARRAY matrix as parameter.
#

def connectedCell(matrix):
    # Write your code here
    max_region = 0
    for i in range(n):
        for j in range(m):
            if matrix[i][j] == 1:
                region = dfs(matrix, i, j, n, m)
                max_region = max(max_region, region)
    return max_region


def dfs(matrix, i, j, n, m):
    if i < 0 or i >= n or j < 0 or j >= m or matrix[i][j] == 0:
        return 0
    matrix[i][j] = 0
    region = 1
    for x in range(-1, 2):
        for y in range(-1, 2):
            region += dfs(matrix, i+x, j+y, n, m)
    return region


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())
    m = int(input().strip())

    matrix = []

    for _ in range(n):
        matrix.append(list(map(int, input().rstrip().split())))

    result = connectedCell(matrix)

    fptr.write(str(result) + '\n')
    fptr.close()
