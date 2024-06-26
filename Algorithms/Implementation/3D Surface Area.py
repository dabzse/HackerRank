import os

#
# Complete the 'surfaceArea' function below.
#
# The function is expected to return an INTEGER.
# The function accepts 2D_INTEGER_ARRAY A as parameter.
#

def surfaceArea(A):
    # Write your code here
    H = len(A)
    W = len(A[0])
    surface_area = 0

    for i in range(H):
        for j in range(W):
            surface_area += 2

            if i == 0:
                surface_area += A[i][j]
            else:
                surface_area += max(0, A[i][j] - A[i - 1][j])

            if i == H - 1:
                surface_area += A[i][j]
            else:
                surface_area += max(0, A[i][j] - A[i + 1][j])

            if j == 0:
                surface_area += A[i][j]
            else:
                surface_area += max(0, A[i][j] - A[i][j - 1])

            if j == W - 1:
                surface_area += A[i][j]
            else:
                surface_area += max(0, A[i][j] - A[i][j + 1])

    return surface_area


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    first_multiple_input = input().rstrip().split()

    H = int(first_multiple_input[0])
    W = int(first_multiple_input[1])
    A = []

    for _ in range(H):
        A.append(list(map(int, input().rstrip().split())))

    result = surfaceArea(A)

    fptr.write(str(result) + '\n')
    fptr.close()
