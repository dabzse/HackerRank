use std::env;
use std::fs::File;
use std::io::{self, BufRead, Write};

/*
 * Complete the 'pokerNim' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY c
 */

fn pokerNim(k: i32, c: &[i32]) -> String {
    let mut x = 0;
    for &i in c {
        x ^= i;
    }
    if x == 0 {
        return "Second".to_string();
    }
    else {
        return "First".to_string();
    }
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

        let k = first_multiple_input[1].trim().parse::<i32>().unwrap();

        let c: Vec<i32> = stdin_iterator.next().unwrap().unwrap()
            .trim_end()
            .split(' ')
            .map(|s| s.to_string().parse::<i32>().unwrap())
            .collect();

        let result = pokerNim(k, &c);

        writeln!(&mut fptr, "{}", result).ok();
    }
}
