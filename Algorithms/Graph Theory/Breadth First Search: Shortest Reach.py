import os
from collections import deque

#
# Complete the 'bfs' function below.
#
# The function is expected to return an INTEGER_ARRAY.
# The function accepts following parameters:
#  1. INTEGER n
#  2. INTEGER m
#  3. 2D_INTEGER_ARRAY edges
#  4. INTEGER s
#

def bfs(n, m, edges, s):
    # Write your code here
    graph = {i: [] for i in range(1, n + 1)}

    for u, v in edges:
        graph[u].append(v)
        graph[v].append(u)

    distances = [-1] * (n + 1)
    distances[s] = 0

    queue = deque([s])

    while queue:
        node = queue.popleft()

        for neighbor in graph[node]:
            if distances[neighbor] == -1:
                distances[neighbor] = distances[node] + 6
                queue.append(neighbor)

    return [distances[i] for i in range(1, n + 1) if i != s]


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    q = int(input().strip())

    for q_itr in range(q):
        first_multiple_input = input().rstrip().split()

        n = int(first_multiple_input[0])
        m = int(first_multiple_input[1])

        edges = []

        for _ in range(m):
            edges.append(list(map(int, input().rstrip().split())))

        s = int(input().strip())

        result = bfs(n, m, edges, s)

        fptr.write(' '.join(map(str, result)))
        fptr.write('\n')

    fptr.close()
