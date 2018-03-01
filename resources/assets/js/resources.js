export const GET_POST = (success,error) => {
    return axios.get('api/posts-api').then(
        response => {
            return success(response.data);
        })
        .catch((err) => {
            return error(err);
        });
}