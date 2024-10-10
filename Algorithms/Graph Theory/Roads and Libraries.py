import os

#
# Complete the 'roadsAndLibraries' function below.
#
# The function is expected to return a LONG_INTEGER.
# The function accepts following parameters:
#  1. INTEGER n
#  2. INTEGER c_lib
#  3. INTEGER c_road
#  4. 2D_INTEGER_ARRAY cities
#

def roadsAndLibraries(n, c_lib, c_road, cities):
    # Write your code here
    if c_lib <= c_road:
        return n * c_lib

    graph = [[] for _ in range(n + 1)]

    for city1, city2 in cities:
        graph[city1].append(city2)
        graph[city2].append(city1)

    visited = [False] * (n + 1)

    def dfs(node):
        stack = [node]
        size = 0
        while stack:
            current = stack.pop()
            if not visited[current]:
                visited[current] = True
                size += 1
                for neighbor in graph[current]:
                    if not visited[neighbor]:
                        stack.append(neighbor)
        return size

    total_cost = 0

    for city in range(1, n + 1):
        if not visited[city]:
            component_size = dfs(city)
            total_cost += c_lib + (component_size - 1) * c_road

    return total_cost


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    q = int(input().strip())

    for q_itr in range(q):
        first_multiple_input = input().rstrip().split()

        n = int(first_multiple_input[0])
        m = int(first_multiple_input[1])

        c_lib = int(first_multiple_input[2])
        c_road = int(first_multiple_input[3])

        cities = []

        for _ in range(m):
            cities.append(list(map(int, input().rstrip().split())))

        result = roadsAndLibraries(n, c_lib, c_road, cities)

        fptr.write(str(result) + '\n')

    fptr.close()
