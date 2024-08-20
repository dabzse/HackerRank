import os


#
# Complete the 'gridChallenge' function below.
#
# The function is expected to return a STRING.
# The function accepts STRING_ARRAY grid as parameter.
#

def gridChallenge(grid):
    # Write your code here
    for i, row in enumerate(grid):
        grid[i] = "".join(sorted(row))

    n = len(grid)
    for col in range(len(grid[0])):
        for row in range(1, n):
            if grid[row][col] < grid[row - 1][col]:
                return "NO"
    return "YES"


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    t = int(input().strip())

    for t_itr in range(t):
        n = int(input().strip())

        grid = []

        for _ in range(n):
            grid_item = input()
            grid.append(grid_item)

        result = gridChallenge(grid)

        fptr.write(result + '\n')

    fptr.close()
