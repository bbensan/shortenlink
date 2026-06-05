export class UpdateShortenLinkDto {
  title?: string;
  original_url?: string;
  shortened_url?: string;
  userId?: string | null;
  status?: string;
}
