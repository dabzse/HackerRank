import os
import sys


sys.setrecursionlimit(10**6)
#
# Complete the 'cutTheTree' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER_ARRAY data
#  2. 2D_INTEGER_ARRAY edges
#

def cutTheTree(data, edges):
    # Write your code here
    n = len(data)

    tree = {i: [] for i in range(n)}
    for u, v in edges:
        tree[u - 1].append(v - 1)
        tree[v - 1].append(u - 1)

    total_sum = sum(data)

    visited = [False] * n
    subtree_sum = [0] * n
    stack = [(0, -1)]

    post_order = []

    while stack:
        node, parent = stack.pop()
        if visited[node]:
            subtree_sum[node] = data[node]
            for neighbor in tree[node]:
                if neighbor != parent:
                    subtree_sum[node] += subtree_sum[neighbor]
        else:
            stack.append((node, parent))
            visited[node] = True
            for neighbor in tree[node]:
                if neighbor != parent:
                    stack.append((neighbor, node))

    min_difference = float("inf")
    for i in range(1, n):
        part_sum = subtree_sum[i]
        remaining_sum = total_sum - part_sum
        min_difference = min(min_difference, abs(part_sum - remaining_sum))

    return min_difference


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())

    data = list(map(int, input().rstrip().split()))

    edges = []

    for _ in range(n - 1):
        edges.append(list(map(int, input().rstrip().split())))

    result = cutTheTree(data, edges)

    fptr.write(str(result) + '\n')

    fptr.close()
