use std::env;
use std::fs::File;
use std::io::{self, BufRead, Write};

/*
 * Complete the 'nimbleGame' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER_ARRAY s as parameter.
 */

fn nimbleGame(s: &[i32]) -> String {
    let xor_sum = s.iter()
        .enumerate()
        .filter(|&(_, &coins)| coins % 2 != 0)
        .fold(0, |acc, (i, _)| acc ^ i);

    if xor_sum == 0 {
        "Second".to_string()
    } else {
        "First".to_string()
    }
}

fn main() {
    let stdin = io::stdin();
    let mut stdin_iterator = stdin.lock().lines();

    let mut fptr = File::create(env::var("OUTPUT_PATH").unwrap()).unwrap();

    let t = stdin_iterator.next().unwrap().unwrap().trim().parse::<i32>().unwrap();

    for _ in 0..t {
        let n = stdin_iterator.next().unwrap().unwrap().trim().parse::<i32>().unwrap();

        let s: Vec<i32> = stdin_iterator.next().unwrap().unwrap()
            .trim_end()
            .split(' ')
            .map(|s| s.to_string().parse::<i32>().unwrap())
            .collect();

        let result = nimbleGame(&s);

        writeln!(&mut fptr, "{}", result).ok();
    }
}
