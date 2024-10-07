use std::env;
use std::fs::File;
use std::io::{self, BufRead, Write};
use std::collections::VecDeque;

/*
 * Complete the 'quickestWayUp' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. 2D_INTEGER_ARRAY ladders
 *  2. 2D_INTEGER_ARRAY snakes
 */

fn quickestWayUp(ladders: &[Vec<i32>], snakes: &[Vec<i32>]) -> i32 {
    let mut board: Vec<i32> = (0..101).collect();

    for ladder in ladders {
        let start = ladder[0];
        let end = ladder[1];
        board[start as usize] = end;
    }

    for snake in snakes {
        let start = snake[0];
        let end = snake[1];
        board[start as usize] = end;
    }

    let mut queue: VecDeque<(i32, i32)> = VecDeque::new();
    let mut visited = vec![false; 101];
    queue.push_back((1, 0));
    visited[1] = true;


    while let Some((current_square, moves)) = queue.pop_front() {
        if current_square == 100 {
            return moves;
        }


        for roll in 1..=6 {
            let next_square = current_square + roll;

            if next_square <= 100 && !visited[next_square as usize] {
                visited[next_square as usize] = true;
                queue.push_back((board[next_square as usize], moves + 1));
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
        let n = stdin_iterator.next().unwrap().unwrap().trim().parse::<i32>().unwrap();

        let mut ladders: Vec<Vec<i32>> = Vec::with_capacity(n as usize);

        for i in 0..n as usize {
            ladders.push(Vec::with_capacity(2_usize));

            ladders[i] = stdin_iterator.next().unwrap().unwrap()
                .trim_end()
                .split(' ')
                .map(|s| s.to_string().parse::<i32>().unwrap())
                .collect();
        }

        let m = stdin_iterator.next().unwrap().unwrap().trim().parse::<i32>().unwrap();

        let mut snakes: Vec<Vec<i32>> = Vec::with_capacity(m as usize);

        for i in 0..m as usize {
            snakes.push(Vec::with_capacity(2_usize));

            snakes[i] = stdin_iterator.next().unwrap().unwrap()
                .trim_end()
                .split(' ')
                .map(|s| s.to_string().parse::<i32>().unwrap())
                .collect();
        }

        let result = quickestWayUp(&ladders, &snakes);

        writeln!(&mut fptr, "{}", result).ok();
    }
}
