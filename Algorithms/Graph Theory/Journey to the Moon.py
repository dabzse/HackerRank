import os

#
# Complete the 'journeyToMoon' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER n
#  2. 2D_INTEGER_ARRAY astronaut
#

def journeyToMoon(n, astronaut):
    # Write your code here
    graph = [[] for _ in range(n)]

    # Build the graph
    for u, v in astronaut:
        graph[u].append(v)
        graph[v].append(u)

    def dfs(node, visited, graph):
        stack = [node]
        visited[node] = True
        size = 0
        while stack:
            curr = stack.pop()
            size += 1
            for neighbor in graph[curr]:
                if not visited[neighbor]:
                    visited[neighbor] = True
                    stack.append(neighbor)
        return size

    visited = [False] * n
    component_sizes = []

    for i in range(n):
        if not visited[i]:
            size = dfs(i, visited, graph)
            component_sizes.append(size)

    total_pairs = (n * (n - 1)) // 2
    same_country_pairs = 0

    for size in component_sizes:
        same_country_pairs += (size * (size - 1)) // 2

    return total_pairs - same_country_pairs


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    first_multiple_input = input().rstrip().split()

    n = int(first_multiple_input[0])
    p = int(first_multiple_input[1])

    astronaut = []

    for _ in range(p):
        astronaut.append(list(map(int, input().rstrip().split())))

    result = journeyToMoon(n, astronaut)

    fptr.write(str(result) + '\n')
    fptr.close()
