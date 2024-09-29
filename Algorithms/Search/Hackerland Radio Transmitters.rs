use std::env;
use std::fs::File;
use std::io::{self, BufRead, Write};

/*
 * Complete the 'hackerlandRadioTransmitters' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY x
 *  2. INTEGER k
 */

fn hackerlandRadioTransmitters(x: &[i32], k: i32) -> i32 {
    let mut x = x.to_vec();
    x.sort();
    let mut i = 0;
    let n = x.len() as i32;
    let mut transmitters = 0;

    while i < n {
        transmitters += 1;
        let mut loc = x[i as usize] + k;

        while i < n && x[i as usize] <= loc {
            i += 1;
        }

        loc = x[(i - 1) as usize] + k;

        while i < n && x[i as usize] <= loc {
            i += 1;
        }
    }

    transmitters
}

fn main() {
    let stdin = io::stdin();
    let mut stdin_iterator = stdin.lock().lines();

    let mut fptr = File::create(env::var("OUTPUT_PATH").unwrap()).unwrap();

    let first_multiple_input: Vec<String> = stdin_iterator.next().unwrap().unwrap()
        .split(' ')
        .map(|s| s.to_string())
        .collect();

    let n = first_multiple_input[0].trim().parse::<i32>().unwrap();

    let k = first_multiple_input[1].trim().parse::<i32>().unwrap();

    let x: Vec<i32> = stdin_iterator.next().unwrap().unwrap()
        .trim_end()
        .split(' ')
        .map(|s| s.to_string().parse::<i32>().unwrap())
        .collect();

    let result = hackerlandRadioTransmitters(&x, k);

    writeln!(&mut fptr, "{}", result).ok();
}
