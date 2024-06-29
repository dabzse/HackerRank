import os

#
# Complete the 'twoPluses' function below.
#
# The function is expected to return an INTEGER.
# The function accepts STRING_ARRAY grid as parameter.
#


def twoPluses(grid):
    # Write your code here
    def get_plus_size(x, y):
        size = 0
        while (
            x - size >= 0
            and x + size < len(grid)
            and y - size >= 0
            and y + size < len(grid[0])
            and grid[x - size][y] == "G"
            and grid[x + size][y] == "G"
            and grid[x][y - size] == "G"
            and grid[x][y + size] == "G"
        ):
            size += 1
        return size - 1

    def get_plus_cells(size, x, y):
        cells = set()
        for k in range(size + 1):
            cells.add((x + k, y))
            cells.add((x - k, y))
            cells.add((x, y + k))
            cells.add((x, y - k))
        return cells

    def overlap(cells1, cells2):
        return not cells1.isdisjoint(cells2)

    max_product = 0
    pluses = []

    for i, row in enumerate(grid):
        for j, cell in enumerate(row):
            if cell == "G":
                size = get_plus_size(i, j)
                for s in range(size + 1):
                    pluses.append((s, i, j))

    for i, (size1, x1, y1) in enumerate(pluses):
        cells1 = get_plus_cells(size1, x1, y1)
        for size2, x2, y2 in pluses[i + 1 :]:
            cells2 = get_plus_cells(size2, x2, y2)
            if not overlap(cells1, cells2):
                product = (4 * size1 + 1) * (4 * size2 + 1)
                max_product = max(max_product, product)

    return max_product


if __name__ == "__main__":
    fptr = open(os.environ["OUTPUT_PATH"], "w")

    first_multiple_input = input().rstrip().split()
    n = int(first_multiple_input[0])
    m = int(first_multiple_input[1])

    grid = []

    for _ in range(n):
        grid_item = input()
        grid.append(grid_item)

    result = twoPluses(grid)

    fptr.write(str(result) + "\n")
    fptr.close()
