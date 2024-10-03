import os

# Complete the evenForest function below.
def evenForest(t_nodes, t_edges, t_from, t_to):
    adj = [[] for _ in range(t_nodes + 1)]


    for i in range(t_edges):
        adj[t_from[i]].append(t_to[i])
        adj[t_to[i]].append(t_from[i])

    visited = [False] * (t_nodes + 1)

    subtree_size = [0] * (t_nodes + 1)

    def dfs(node):
        visited[node] = True
        size = 1
        for neighbor in adj[node]:
            if not visited[neighbor]:
                size += dfs(neighbor)
        subtree_size[node] = size
        return size

    dfs(1)

    cuttable_edges = 0
    for i in range(2, t_nodes + 1):
        if subtree_size[i] % 2 == 0:
            cuttable_edges += 1

    return cuttable_edges


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    t_nodes, t_edges = map(int, input().rstrip().split())

    t_from = [0] * t_edges
    t_to = [0] * t_edges

    for i in range(t_edges):
        t_from[i], t_to[i] = map(int, input().rstrip().split())

    res = evenForest(t_nodes, t_edges, t_from, t_to)

    fptr.write(str(res) + '\n')
    fptr.close()
