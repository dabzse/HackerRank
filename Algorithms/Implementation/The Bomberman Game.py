import os

#
# Complete the 'bomberMan' function below.
#
# The function is expected to return a STRING_ARRAY.
# The function accepts following parameters:
#  1. INTEGER n
#  2. STRING_ARRAY grid
#

def bomberMan(n, grid):
    # Write your code here
    if n == 0 or n == 1:
        return grid
    elif n % 2 == 0:
        return ["O" * len(row) for row in grid]
    else:
        def detonate(grid):
            r, c = len(grid), len(grid[0])
            new_grid = [["O"] * c for _ in range(r)]
            for i in range(r):
                for j in range(c):
                    if grid[i][j] == "O":
                        new_grid[i][j] = "."
                        if i > 0:
                            new_grid[i - 1][j] = "."
                        if i < r - 1:
                            new_grid[i + 1][j] = "."
                        if j > 0:
                            new_grid[i][j - 1] = "."
                        if j < c - 1:
                            new_grid[i][j + 1] = "."
            return ["".join(row) for row in new_grid]

        grid_after_first_detonation = detonate(grid)
        grid_after_second_detonation = detonate(grid_after_first_detonation)

        if (n - 1) % 4 == 0:
            return grid_after_second_detonation
        else:
            return grid_after_first_detonation


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    first_multiple_input = input().rstrip().split()

    r = int(first_multiple_input[0])
    c = int(first_multiple_input[1])
    n = int(first_multiple_input[2])

    grid = []

    for _ in range(r):
        grid_item = input()
        grid.append(grid_item)

    result = bomberMan(n, grid)

    fptr.write('\n'.join(result))
    fptr.write('\n')
    fptr.close()
