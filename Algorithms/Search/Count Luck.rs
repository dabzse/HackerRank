use std::env;
use std::fs::File;
use std::io::{self, BufRead, Write};

/*
 * Complete the 'countLuck' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. STRING_ARRAY matrix
 *  2. INTEGER k
 */

fn countLuck(matrix: &[String], k: i32) -> String {
    let n = matrix.len();
    let m = matrix[0].len();
    let mut start = (0, 0);

    for i in 0..n {
        for j in 0..m {
            if matrix[i].chars().nth(j).unwrap() == 'M' {
                start = (i, j);
                break;
            }
        }
    }

    let mut visited = vec![vec![false; m]; n];

    let junctions = dfs(&matrix, start.0, start.1, &mut visited);

    if junctions == k {
        "Impressed".to_string()
    }
    else {
        "Oops!".to_string()
    }
}

fn dfs(matrix: &[String], x: usize, y: usize, visited: &mut Vec<Vec<bool>>) -> i32 {
    let n = matrix.len();
    let m = matrix[0].len();
    let directions = vec![(0, 1), (1, 0), (0, -1), (-1, 0)];

    if matrix[x].chars().nth(y).unwrap() == '*' {
        return 0;
    }

    visited[x][y] = true;
    let mut valid_moves = 0;

    for &(dx, dy) in &directions {
        let nx = (x as isize + dx) as usize;
        let ny = (y as isize + dy) as usize;

        if nx < n && ny < m && !visited[nx][ny] && matrix[nx].chars().nth(ny).unwrap() != 'X' {
            valid_moves += 1;
        }
    }

    let mut junctions = 0;

    for &(dx, dy) in &directions {
        let nx = (x as isize + dx) as usize;
        let ny = (y as isize + dy) as usize;

        if nx < n && ny < m && !visited[nx][ny] && matrix[nx].chars().nth(ny).unwrap() != 'X' {
            let result = dfs(matrix, nx, ny, visited);
            if result != -1 {
                junctions += result;
                if valid_moves > 1 {
                    junctions += 1;
                }
                return junctions;
            }
        }
    }

    -1
}

fn main() {
    let stdin = io::stdin();
    let mut stdin_iterator = stdin.lock().lines();

    let mut fptr = File::create(env::var("OUTPUT_PATH").unwrap()).unwrap();

    let t = stdin_iterator.next().unwrap().unwrap().trim().parse::<i32>().unwrap();

    for _ in 0..t {
        let first_multiple_input: Vec<String> = stdin_iterator.next().unwrap().unwrap()
            .split(' ')
            .map(|s| s.to_string())
            .collect();

        let n = first_multiple_input[0].trim().parse::<i32>().unwrap();

        let m = first_multiple_input[1].trim().parse::<i32>().unwrap();

        let mut matrix: Vec<String> = Vec::with_capacity(n as usize);

        for _ in 0..n {
            let matrix_item = stdin_iterator.next().unwrap().unwrap();
            matrix.push(matrix_item);
        }

        let k = stdin_iterator.next().unwrap().unwrap().trim().parse::<i32>().unwrap();

        let result = countLuck(&matrix, k);

        writeln!(&mut fptr, "{}", result).ok();
    }
}
