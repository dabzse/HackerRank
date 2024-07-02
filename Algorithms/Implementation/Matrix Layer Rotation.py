#
# Complete the 'matrixRotation' function below.
#
# The function accepts following parameters:
#  1. 2D_INTEGER_ARRAY matrix
#  2. INTEGER r
#

def matrixRotation(matrix, r):
    # Write your code here
    m = len(matrix)
    n = len(matrix[0])
    num_layers = min(m, n) // 2

    for layer in range(num_layers):
        layer_elements = []

        for j in range(layer, n - layer):
            layer_elements.append(matrix[layer][j])

        for i in range(layer + 1, m - layer):
            layer_elements.append(matrix[i][n - layer - 1])

        for j in range(n - layer - 2, layer - 1, -1):
            layer_elements.append(matrix[m - layer - 1][j])

        for i in range(m - layer - 2, layer, -1):
            layer_elements.append(matrix[i][layer])

        effective_rotations = r % len(layer_elements)
        rotated_elements = (
            layer_elements[effective_rotations:] + layer_elements[:effective_rotations]
        )

        idx = 0

        for j in range(layer, n - layer):
            matrix[layer][j] = rotated_elements[idx]
            idx += 1

        for i in range(layer + 1, m - layer):
            matrix[i][n - layer - 1] = rotated_elements[idx]
            idx += 1

        for j in range(n - layer - 2, layer - 1, -1):
            matrix[m - layer - 1][j] = rotated_elements[idx]
            idx += 1

        for i in range(m - layer - 2, layer, -1):
            matrix[i][layer] = rotated_elements[idx]
            idx += 1

    for row in matrix:
        print(*row)


if __name__ == '__main__':
    first_multiple_input = input().rstrip().split()

    m = int(first_multiple_input[0])
    n = int(first_multiple_input[1])
    r = int(first_multiple_input[2])

    matrix = []

    for _ in range(m):
        matrix.append(list(map(int, input().rstrip().split())))

    matrixRotation(matrix, r)
