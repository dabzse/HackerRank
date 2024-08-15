import os

#
# Complete the 'knightlOnAChessboard' function below.
#
# The function is expected to return a 2D_INTEGER_ARRAY.
# The function accepts INTEGER n as parameter.
#

def knightlOnAChessboard(n):
    # Write your code here
    def bfs(a, b):
        queue = [(0, 0, 0)]
        visited = set()
        while queue:
            x, y, steps = queue.pop(0)
            if x == n - 1 and y == n - 1:
                return steps
            for dx, dy in [
                (a, b),
                (-a, b),
                (a, -b),
                (-a, -b),
                (b, a),
                (-b, a),
                (b, -a),
                (-b, -a),
            ]:
                nx, ny = x + dx, y + dy
                if 0 <= nx < n and 0 <= ny < n and (nx, ny) not in visited:
                    visited.add((nx, ny))
                    queue.append((nx, ny, steps + 1))
        return -1

    result = [[0] * (n - 1) for _ in range(n - 1)]
    for a in range(1, n):
        for b in range(1, n):
            result[a - 1][b - 1] = bfs(a, b)

    return result


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())

    result = knightlOnAChessboard(n)

    fptr.write('\n'.join([' '.join(map(str, x)) for x in result]))
    fptr.write('\n')
    fptr.close()
