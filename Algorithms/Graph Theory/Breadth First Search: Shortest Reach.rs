use std::env;
use std::fs::File;
use std::io::{self, BufRead, Write};
use std::collections::VecDeque;

/*
 * Complete the 'bfs' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER m
 *  3. 2D_INTEGER_ARRAY edges
 *  4. INTEGER s
 */

fn bfs(n: i32, m: i32, edges: &[Vec<i32>], s: i32) -> Vec<i32> {
    let mut graph: Vec<Vec<i32>> = vec![Vec::new(); (n + 1) as usize];

    for edge in edges {
        let u = edge[0];
        let v = edge[1];
        graph[u as usize].push(v);
        graph[v as usize].push(u);
    }

    let mut distances = vec![-1; (n + 1) as usize];
    distances[s as usize] = 0;

    let mut queue = VecDeque::new();
    queue.push_back(s);

    while let Some(node) = queue.pop_front() {
        for &neighbor in &graph[node as usize] {
            if distances[neighbor as usize] == -1 {
                distances[neighbor as usize] = distances[node as usize] + 6;
                queue.push_back(neighbor);
            }
        }
    }

    let mut result = Vec::with_capacity((n - 1) as usize);
    for i in 1..=n {
        if i != s {
            result.push(distances[i as usize]);
        }
    }

    result
}

fn main() {
    let stdin = io::stdin();
    let mut stdin_iterator = stdin.lock().lines();

    let mut fptr = File::create(env::var("OUTPUT_PATH").unwrap()).unwrap();

    let q = stdin_iterator.next().unwrap().unwrap().trim().parse::<i32>().unwrap();

    for _ in 0..q {
        let first_multiple_input: Vec<String> = stdin_iterator.next().unwrap().unwrap()
            .split(' ')
            .map(|s| s.to_string())
            .collect();

        let n = first_multiple_input[0].trim().parse::<i32>().unwrap();
        let m = first_multiple_input[1].trim().parse::<i32>().unwrap();
        let mut edges: Vec<Vec<i32>> = Vec::with_capacity(m as usize);

        for i in 0..m as usize {
            edges.push(Vec::with_capacity(2_usize));

            edges[i] = stdin_iterator.next().unwrap().unwrap()
                .trim_end()
                .split(' ')
                .map(|s| s.to_string().parse::<i32>().unwrap())
                .collect();
        }

        let s = stdin_iterator.next().unwrap().unwrap().trim().parse::<i32>().unwrap();

        let result = bfs(n, m, &edges, s);

        for i in 0..result.len() {
            write!(&mut fptr, "{}", result[i]).ok();

            if i != result.len() - 1 {
                write!(&mut fptr, " ").ok();
            }
        }

        writeln!(&mut fptr).ok();
    }
}
