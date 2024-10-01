use std::env;
use std::collections::HashMap;
use std::fs::File;
use std::io::{self, BufRead, Write};

/*
 * Complete the 'minimumLoss' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts LONG_INTEGER_ARRAY price as parameter.
 */

fn minimumLoss(price: &[i64]) -> i32 {
    let n = price.len();
    let mut min_loss = i64::MAX;

    let mut price_dict: HashMap<i64, usize> = HashMap::new();
    for (i, &p) in price.iter().enumerate() {
        price_dict.insert(p, i);
    }

    let mut sorted_prices = price.to_vec();
    sorted_prices.sort();

    for i in 0..n - 1 {
        let current_loss = sorted_prices[i + 1] - sorted_prices[i];

        if current_loss < min_loss
            && price_dict[&sorted_prices[i + 1]] < price_dict[&sorted_prices[i]]
        {
            min_loss = current_loss;
        }
    }

    min_loss as i32
}

fn main() {
    let stdin = io::stdin();
    let mut stdin_iterator = stdin.lock().lines();

    let mut fptr = File::create(env::var("OUTPUT_PATH").unwrap()).unwrap();

    let n = stdin_iterator.next().unwrap().unwrap().trim().parse::<i32>().unwrap();

    let price: Vec<i64> = stdin_iterator.next().unwrap().unwrap()
        .trim_end()
        .split(' ')
        .map(|s| s.to_string().parse::<i64>().unwrap())
        .collect();

    let result = minimumLoss(&price);

    writeln!(&mut fptr, "{}", result).ok();
}
