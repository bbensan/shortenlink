export class UpdateShortenLinkDto {
  title?: string | null;
  original_url?: string;
  shortened_url?: string;
  userId?: string | null;
  userIp?: string | null;
  status?: string;
}
